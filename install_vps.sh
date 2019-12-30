# Install script for Ubuntu 18.04

# Your data

SERVER_NAME="laravel-su"

USER="someuser"
SUDO_PASSWORD="somepass"
PUBLIC_SSH_KEYS="# id_rsa.pub
ssh-rsa xxxxxx"
# WARNING authentification by password will be disabled for root and user !

SWAP_SIZE="200M"
SERVER_TIMEZONE="Europe/Moscow" # local timezone for cron
MAX_JOURNAL_SIZE=50M # max size of /var/log/journal

# =================== DO NOT CHANGE BELOW =====================================

sed -i "s/#precedence ::ffff:0:0\/96  100/precedence ::ffff:0:0\/96  100/" /etc/gai.conf

export DEBIAN_FRONTEND=noninteractive

apt-get update
apt-get upgrade -y

apt-get install -y --force-yes software-properties-common
add-apt-repository universe

apt-get install -y --force-yes build-essential curl fail2ban gcc git libmcrypt4 libpcre3-dev \
make python2.7 python-pip sendmail supervisor ufw unattended-upgrades unzip whois zsh ncdu

# Additional useful packages

apt-get install -y --force-yes mc p7zip-full htop tmux
pip install httpie

# Disable password authentication

sed -i "/PasswordAuthentication yes/d" /etc/ssh/sshd_config
echo "" | sudo tee -a /etc/ssh/sshd_config
echo "" | sudo tee -a /etc/ssh/sshd_config
echo "PasswordAuthentication no" | sudo tee -a /etc/ssh/sshd_config

ssh-keygen -A
service ssh restart

if [ ! -d /root/.ssh ]
then
    mkdir -p /root/.ssh
    touch /root/.ssh/authorized_keys
fi

# Set hostname

echo "$SERVER_NAME" > /etc/hostname
sed -i "s/127\.0\.0\.1.*localhost/127.0.0.1	$SERVER_NAME localhost/" /etc/hosts
hostname $SERVER_NAME

# Set timezone

ln -sf /usr/share/zoneinfo/$SERVER_TIMEZONE /etc/localtime

# Setup user

useradd $USER
mkdir -p /home/$USER/.ssh
adduser $USER sudo

chsh -s /bin/bash $USER
cp /root/.profile /home/$USER/.profile
cp /root/.bashrc /home/$USER/.bashrc
touch /home/$USER/.bash_aliases

echo "PS1='${debian_chroot:+($debian_chroot)}\[\033[01;31m\]\u\[\033[01;33m\]@\[\033[01;36m\]\h \[\033[01;33m\]\w \[\033[01;35m\]\$ \[\033[00m\]'" >> /home/$USER/.bash_aliases

PASSWORD=$(mkpasswd $SUDO_PASSWORD)
usermod --password $PASSWORD $USER

cat > /root/.ssh/authorized_keys << EOF
$PUBLIC_SSH_KEYS
EOF

cp /root/.ssh/authorized_keys /home/$USER/.ssh/authorized_keys

ssh-keygen -f /home/$USER/.ssh/id_rsa -t rsa -N ''

ssh-keyscan -H github.com >> /home/$USER/.ssh/known_hosts
ssh-keyscan -H bitbucket.org >> /home/$USER/.ssh/known_hosts
ssh-keyscan -H gitlab.com >> /home/$USER/.ssh/known_hosts

chown -R $USER:$USER /home/$USER
chmod -R 755 /home/$USER
chmod 700 /home/$USER/.ssh/id_rsa

# Install Nginx

apt-get install -y --force-yes nginx
systemctl enable nginx.service

openssl dhparam -out /etc/nginx/dhparams.pem 2048

sed -i "s/worker_processes.*/worker_processes auto;/" /etc/nginx/nginx.conf
sed -i "s/# multi_accept.*/multi_accept on;/" /etc/nginx/nginx.conf
sed -i "s/# server_names_hash_bucket_size.*/server_names_hash_bucket_size 128;/" /etc/nginx/nginx.conf

cat > /etc/nginx/conf.d/gzip.conf << EOF
gzip_comp_level 5;
gzip_min_length 256;
gzip_proxied any;
gzip_vary on;

gzip_types
application/atom+xml
application/javascript
application/json
application/rss+xml
application/vnd.ms-fontobject
application/x-font-ttf
application/x-web-app-manifest+json
application/xhtml+xml
application/xml
font/opentype
image/svg+xml
image/x-icon
text/css
text/plain
text/x-component;

EOF

rm /etc/nginx/sites-enabled/default
rm /etc/nginx/sites-available/default
service nginx restart

cat > /etc/nginx/sites-available/catch-all << EOF
server {
    return 404;
}
EOF
ln -s /etc/nginx/sites-available/catch-all /etc/nginx/sites-enabled/catch-all

cat > /etc/nginx/sites-available/example << EOF
server {

    listen 80;
    server_name DOMAIN.COM;

    location / {
        proxy_pass  http://127.0.0.1:7001/; # external nginx port in docker-compose
    }

}
EOF

cat > /etc/nginx/sites-available/laravel.su << EOF
server {

    listen 80;
    server_name laravel.su;

    location / {
        proxy_pass  http://127.0.0.1:7001/; # external nginx port in docker-compose
    }

}
EOF

ln -s /etc/nginx/sites-available/laravel.su /etc/nginx/sites-enabled/laravel.su
service nginx reload

usermod -a -G www-data $USER
id $USER
groups $USER

# Configure Supervisor

systemctl enable supervisor.service
service supervisor start

# Configure swapfile

fallocate -l $SWAP_SIZE /swapfile
chmod 600 /swapfile
mkswap /swapfile
swapon /swapfile
echo "/swapfile none swap sw 0 0" >> /etc/fstab
echo "vm.swappiness=30" >> /etc/sysctl.conf
echo "vm.vfs_cache_pressure=50" >> /etc/sysctl.conf

# Setup security upgrades

cat > /etc/apt/apt.conf.d/50unattended-upgrades << EOF
Unattended-Upgrade::Allowed-Origins {
    "Ubuntu bionic-security";
};
Unattended-Upgrade::Package-Blacklist {
    //
};
EOF

cat > /etc/apt/apt.conf.d/10periodic << EOF
APT::Periodic::Update-Package-Lists "1";
APT::Periodic::Download-Upgradeable-Packages "1";
APT::Periodic::AutocleanInterval "7";
APT::Periodic::Unattended-Upgrade "1";
EOF

# Control journal size

journalctl --vacuum-size=$MAX_JOURNAL_SIZE

# Install Docker - https://docs.docker.com/install/linux/docker-ce/ubuntu/

apt-get install -y --force-yes apt-transport-https ca-certificates gnupg-agent
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
apt-get update
apt-get install -y --force-yes docker-ce docker-ce-cli containerd.io
systemctl enable docker

# Usage docker without sudo

groupadd docker
usermod -aG docker $USER

# Install docker-compose

curl -L "https://github.com/docker/compose/releases/download/1.25.0/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
chmod +x /usr/local/bin/docker-compose

# Install docker utilites (optional)

# Dry https://github.com/moncho/dry
echo "alias dry='docker run --rm -it -v /var/run/docker.sock:/var/run/docker.sock -e DOCKER_HOST=$DOCKER_HOST moncho/dry'" >> /home/$USER/.bash_aliases

# Lazydocker https://github.com/jesseduffield/lazydocker
echo "alias lzd='docker run --rm -it -v /var/run/docker.sock:/var/run/docker.sock -v /yourpath/config:/.config/jesseduffield/lazydocker lazyteam/lazydocker'" >> /home/$USER/.bash_aliases

# After install

apt-get autoclean

# Setup firewall

ufw allow 22
ufw allow 80
ufw allow 443
ufw enable

echo "INSTALLING COMPLETED. PLEASE REBOOT VPS"

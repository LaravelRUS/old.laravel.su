function viewport(){
    var e = window , a = 'inner';
    if ( !( 'innerWidth' in window ) ) { a = 'client'; e = document.documentElement || document.body; }
    return { width : e[ a+'Width' ] , height : e[ a+'Height' ] }
}
var screen = viewport();

if(screen.width < 1002){
    // Content
    document.querySelectorAll("table[width='60%']").forEach(function(item){ item.setAttribute("width", "95%"); });
    // Comments
    document.querySelectorAll("table[width='55%']").forEach(function(item){ item.setAttribute("width", "85%"); });
    // Title
    document.querySelectorAll("font[size='5']").forEach(function(item){ item.setAttribute("size", "8"); });
    document.querySelectorAll("font[size='3']").forEach(function(item){ item.setAttribute("size", "8"); });
    // Text
    document.querySelectorAll("font[size='2']").forEach(function(item){ item.setAttribute("size", "6"); });
}else{
    if(screen.width < 1280){
        // Content
        document.querySelectorAll("table[width='60%']").forEach(function(item){ item.setAttribute("width", "85%"); });
        // Comments
        document.querySelectorAll("table[width='55%']").forEach(function(item){ item.setAttribute("width", "85%"); });
        // Title
        document.querySelectorAll("font[size='5']").forEach(function(item){ item.setAttribute("size", "6"); });
        document.querySelectorAll("font[size='3']").forEach(function(item){ item.setAttribute("size", "6"); });
        // Text
        document.querySelectorAll("font[size='2']").forEach(function(item){ item.setAttribute("size", "4"); });
    }
}

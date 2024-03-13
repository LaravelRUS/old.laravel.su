const { userAgent } = window.navigator;

export const isIos = /iPhone|iPad|iPod/.test(userAgent);
export const isAndroid = /Android/.test(userAgent);
export const isMobile = isIos || isAndroid;
export const isMac = /Mac/.test(userAgent);
export const isDesktopSafari = !isMobile && /Safari/.test(userAgent);

export const isIosApp = /Turbo Native iOS/.test(userAgent);
export const isAndroidApp = /Turbo Native Android/.test(userAgent);
export const isMobileApp = isIosApp || isAndroidApp;
export const isDesktopApp = /HEY.+Electron/.test(userAgent);

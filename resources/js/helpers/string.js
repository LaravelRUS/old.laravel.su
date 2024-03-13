export function capitalize(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

export function dasherize(string) {
    return string.replace(/([A-Z])/g, (_, char) => `-${char.toLowerCase()}`);
}

export function escapeRegExp(string) {
    return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
}

function easteregg() {
    const profile = document.getElementById('profile');
    var count = 0;
    const body = document.getElementById('body');
    
    profile.onclick = function counter() {
        count++;
        if (count++ >= 20) {
            document.body.className = 'transform';
            count = 0;
        }
    }
}
export { easteregg };
const profile = document.getElementById('profile');
var count = 0;

profile.onclick = function counter() {
    count++;
    console.log(count);
    if (count++ >= 20) {
        window.open('https://www.youtube.com/watch?v=dQw4w9WgXcQ');
        count = 0;
    }
}
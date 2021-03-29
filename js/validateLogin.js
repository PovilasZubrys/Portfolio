function loginValidate() {
    var email = document.forms["login"]["email"].value;
    const notice = document.getElementById('notice');

    if (email == '') {
        notice.innerHTML = '<div class="contactMessage">Email must be filled!</div>';
        return false;
    }
    if (!email.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g)) {
        notice.innerHTML = '<div class="contactMessage">This has to be proper email</div>';
        return false;
    }
    return true;
}
function formValidate() {
    var email = document.forms["contact"]["email"].value;
    var name = document.forms["contact"]["name"].value;
    var message = document.forms["contact"]["message"].value;
    const notice = document.getElementById('notice');

    if (email == '') {
        notice.innerHTML = '<div class="contactMessage">Email must be filled!</div>';
        return false;
    }
    if (!email.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g)) {
        notice.innerHTML = '<div class="contactMessage">This has to be proper email</div>';
        return false;
    }
    if (name == '') {
        notice.innerHTML = '<div class="contactMessage">I would like to know your name! :)</div>';
        return false;
    }
    if (!name.match(/([A-Za-z])\w+/gu)) {
        notice.innerHTML = '<div class="contactMessage">Name cannot conatin special characters.</div>';
        return false;
    }
    if (name.match(/[0-9]+/g)) {
        notice.innerHTML = '<div class="contactMessage">Only letters, no numbers! :)</div>';
        return false;
    }
    if (name.length > 50) {
        notice.innerHTML = '<div class="contactMessage">Oof, 50 characters long? Never heard of that long of a name. Please shorten it! Thanks!</div>';
        return false;
    }
    if (!message.match(/^[A-Za-z0-9 ]+$/)) {
        notice.innerHTML = '<div class="contactMessage">Please, no special characters! Thanks!</div>';
        return false;
    }
    return true;
}
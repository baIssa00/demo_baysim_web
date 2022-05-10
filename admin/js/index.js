var request = new XMLHttpRequest();
request.onreadystatechange = function () {
    if (request.readyState === request.DONE) {
        if (request.status === 200) {
            console.log(this.responseText);
        } else {
            alert('erreur 500');
        }
    }
}
request.open('GET',  'deleteUser.php?idUser=2', true);
request.send();
request =null;

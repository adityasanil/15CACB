function showTableAdmin(str, holder) {
    var xhttp;
    if (str == "") {
        document.getElementById("list").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("list").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "../../php/getTableAdmin.php?holderAdmin=" + holder + "&orderByAdmin=" + str, true);
    xhttp.send();
}


function showDropDown() {
    document.getElementById('drop').classList.toggle('show');
}


function searchClient(value) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("list").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "../../php/searchFilter.php?value=" + value, true);
    xhttp.send();
}
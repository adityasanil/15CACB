function sendInvoice(value) {

	var name = value;
	var message = value + ' uploaded a new invoice file.';
	var xhttpObj = new XMLHttpRequest();
	xhttpObj.open("POST", "https://script.google.com/macros/s/AKfycbyvvMuRXkIdrlf2YZbcsMLpTPVIxe_AZjt29jXoFS-pKYnoJnQ/exec", true);
	xhttpObj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttpObj.send("message=" + message);
}
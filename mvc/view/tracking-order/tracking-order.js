function myFunction() {
    let text;
    if (confirm("Xác nhận hủy đơn") == true) {
    document.getElementById("cancel-order").classList.add('passive');
    }
}
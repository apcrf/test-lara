
function btnDelOnClick(id) {
    var aBox = new appBox();
    aBox.picture = "Trash";
    aBox.message = "<big>Удалить запись?</big><br><small>Это действие необратимо.</small>";
    aBox.buttons = ["Trash", "Cancel"];
    aBox.buttonClick = function(name) {
        if (name == "Trash") {
            location.href = "/publisher/del/" + id;
        }
    }
    aBox.show();
    // Customization (after .show())
    aBox.elms.footer.style.backgroundColor = "White";
    aBox.elms.picture.style.minWidth = "2.5rem";
    aBox.elms.picture.style.color = "Grey";
    aBox.elms.buttons.Trash.innerHTML = "Удалить";
    aBox.elms.buttons.Cancel.innerHTML = "Отмена";
}

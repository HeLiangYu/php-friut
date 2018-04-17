/**
 * Created by lenovo on 2016/4/27.
 */
function tableColor() {
    var tables = document.getElementsByTagName("table");
    var odd, rows;
    for (var i = 0; i < tables.length; i++) {
        odd = true;
        rows = tables[i].getElementsByTagName("tr");
        for (var j = 0; j < rows.length; j++) {
            if (odd == true){
                rows[j].style.backgroundColor = "rgb(247,247,247)";
                odd = false;
            }else
            {
                odd = true;
            }
        }
    }
}
window.onload = tableColor;
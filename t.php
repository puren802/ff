<scRIPT language="Javascript">
function display_image(form) {
    selectionname = form.imagename.options[form.imagename.selectedIndex].text;
    selection = form.imagename.options[form.imagename.selectedIndex].value;
    PreView = window.open("", "Preview", "toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=0,resizable=0,copyhistory=0,width=auto,height=auto");
    PreView.document.open();
    PreView.document.write("<HTML><HEAD>");
    PreView.document.write("<TITLE>Preview</TITLE>");
    PreView.document.write("</HEAD><BODY BGCOLOR=FFFFFF TEXT=000000>");
    PreView.document.write("<FORM><CENTER><B><FONT SIZE=+1>" + 
    selectionname + "</FONT></B><HR>");
    PreView.document.write("<IMG HSPACE=0 VSPACE=0 " +
                           "SRC='" + selection + "'>");
    PreView.document.write("<HR><FORM><INPUT TYPE='button' VALUE='Close' " +
                           "onClick='window.close()'></FORM>");
    PreView.document.write("</CENTER>");
    PreView.document.write("</BODY></HTML>");
    PreView.document.close();
}
</scRIPT>


<FORM>
    <B>이미지를 선택하세요</B>
    <select NAME="imagename" onChange="display_image(this.form)">
    <option value="item1-1.jpg">Image 1 
    <option value="item1-2.jpg">Image 2 
    <option value="item1-3.jpg">Image 3 
    </select>

</FORM>
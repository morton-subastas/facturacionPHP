function generatePDF(){
  const element = document.getElementById("principal");

  alert (element);
  html2pdf()
    .from(element);
    .save();

}

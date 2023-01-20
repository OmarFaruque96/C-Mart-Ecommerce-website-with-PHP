const chooseFile = document.getElementById("choose-file");
const imgPreview = document.getElementById("img-preview");

chooseFile.addEventListener("change", function () {
  getImgData();
});

function getImgData() {
  const files = chooseFile.files[0];
  if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener("load", function () {
      imgPreview.style.display = "block";
      imgPreview.innerHTML = '<img src="' + this.result + '" />';
    });    
  }
}




// function showSubCategory(str) {

//   alert(str);

//   if (str == "") {
//     document.getElementById("show_sub").innerHTML = "";
//     return;
//   } else {
//     var xmlhttp = new XMLHttpRequest();
//     xmlhttp.onreadystatechange = function() {
//       if (this.readyState == 4 && this.status == 200) {
//         document.getElementById("show_sub").innerHTML = this.responseText;
//       }
//     };
//     xmlhttp.open("GET","../../admin/ajax/getCategory.php?q="+str,true);
//     xmlhttp.send();
//   }
// }


// $(document).ready(function(){

//   $('.catselect').on('change', function(){
//     if ($(this).is(':checked')){
//       alert($(this).val());
//     }
//     else{
      
//     }
//   });

// });



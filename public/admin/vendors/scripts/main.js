function chageImg(id){
    let imgSrc = document.getElementById(id).getAttribute('src');
    document.getElementById('show-img').setAttribute('src',document.getElementById(id).getAttribute('src'));
  // document.getElementById('img-main').setAttribute('src'=imgSrc);
   console.log(imgSrc);
   
}
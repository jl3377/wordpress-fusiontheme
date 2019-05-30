/* Modal Images 0.1
 * add modal Images to you page
 * To use this script, only need add attribute class="modalImg" to img elements and add this script into your <head>  
 * @author Jose Luis Rojo <jose@artegrafico.net> */
 
window.addEventListener('load', () => {

    // create the parent element <div id="modal">
    let modal = document.createElement("div");
    modal.setAttribute('id', 'modal');
    modal.setAttribute('class', 'modal');

    // create the child element <div id="modalClose">
    let modalClose = document.createElement('div');
    modalClose.setAttribute('id', 'modalClose');
    modalClose.innerHTML = "&times;";

    // create the child element <img>
    let modalImg = document.createElement('img');
    modalImg.setAttribute('id', 'modalImg');

    // create the child element <div id="modalText"
    let modalText = document.createElement('div');
    modalText.setAttribute('id', 'modalText');

    // open node elements
    document.body.append(modal);
    modal.appendChild(modalClose);
    modal.appendChild(modalImg);
    modal.appendChild(modalText);

    // find all elements with class modalImg
    let imgList = document.querySelectorAll(".modalImg"),
        i;
    for (const img of imgList) {
        // add event click to show modal and add src attribute
        img.addEventListener('click', () => {
            modal.style.display = "block";
            modalImg.src = img.src;
            modalText.innerHTML = img.alt;
        });
    }

    // event, hide modal if user click modalClose "x"
    modalClose.addEventListener("click", function () {
        modal.style.display = "none";
    })
    // event, hide modal if user click on the modal 
    modal.addEventListener("click", function () {
        modal.style.display = "none";
    })
})
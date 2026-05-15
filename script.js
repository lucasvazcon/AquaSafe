let btnNext = document.querySelector('.next')//selecione o botão "next" (proximo)
let btnBack = document.querySelector('.back')//selecione o botão "back" (anterior)

let container = document.querySelector('.container')//selecione o contêiner principal
let list = document.querySelector('.container .list')//selecione o elemento que contém a lista de itens 
let thumb = document.querySelector('.container .thumb')//selecione o elemneto que contém a lista de miniaturas (thumbnails)

btnNext.onclick = () => moveItemsOnClick('next')//define o evento de clique para o botão "next"
btnBack.onclick = () => moveItemsOnClick('back')//define o evento de clique para o botão "back"

function moveItemsOnClick(type) {//função que move os itens ao clicar em "next" ou "back"
    let listItems = document.querySelectorAll('.list .list-item')//seleciona todos os itens da lista
    let thumbItems = document.querySelectorAll('.thumb .thumb-item')//seleciona todos os itens da miniaturas

    if (type === 'next') {//se o botão clicado for "next"
        list.appendChild(listItems[0])//move o primeiro item da lista para o final
        thumb.appendChild(thumbItems[0])//move a primeira miniatura para o final
        container.classList.add('next')//adiciona a classe "next" ao contêiner (pode ser usada para animação)
    } else {//move o último item da lista para o inicio

        list.prepend(listItems[listItems.length - 1])//move o último item da lista para o início 
        thumb.prepend(thumbItems[thumbItems.length - 1])//move a última miniatura para o início
        container.classList.add('back')///adiciona a classe "back" ao contêiner (pode ser usada para animação)
    }

    setTimeout(() => {//aguarde 3 segundos e depois remove as classes "next" e "back"
        container.classList.remove('next')
        container.classList.remove('back')
    }, 1000);
}

// Redirecionamento dos botões "Saiba Mais"
document.querySelectorAll('.btn-saiba-mais').forEach(button => {
    button.addEventListener('click', () => {
        const destino = button.getAttribute('data-link');
        window.location.href = destino;
    });
});
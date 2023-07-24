let skillsBtn = document.querySelectorAll('.skills__item-button');
let skillsBottom = document.querySelectorAll('.skills__item-bottom');


skillsBtn.forEach((currentBtn, index) => {
    currentBtn.addEventListener('click',  () => {
        currentBtn.classList.toggle('skills__button--active')
        for (let i = 0; i < skillsBottom.length; i++) {
            let bottomData = skillsBottom[i].getAttribute('data-item');
            if (index == bottomData) {
                skillsBottom[bottomData].classList.toggle('skills__item-bottom--active');
                if (skillsBottom[bottomData].classList.contains('skills__item-bottom--active')) {
                    skillsBottom[bottomData].style.maxHeight = skillsBottom[bottomData].scrollHeight + 'px';
                } else {
                    skillsBottom[bottomData].style.maxHeight = null;
                }

            }
        }
    })
});


// let openBtn = document.querySelector('.one__video-img');
// let videoPop = document.querySelector('.video__pop-up');
// let body = document.querySelector('body');
//
//
// let videoFrame = document.querySelector('.video__pop-frame')
//
// openBtn.addEventListener('click', ()=>{
//     videoPop.classList.add('video__pop--active');
//     body.classList.add('overflowHidden');
//     videoFrame.setAttribute('src', 'https://www.youtube.com/embed/3sZnSgjasm8?start=2');
// });
//
// videoPop.addEventListener('click', (event)=> {
//     if(event.target.classList.contains('video__pop-up')) {
//         body.classList.remove('overflowHidden');
//         videoPop.classList.remove('video__pop--active');
//         videoFrame.setAttribute('src', 'none');
//     }
// });



//////////////////////////////////////////////

// POP UP FORM

/////////////////////////////////////////////

let buyBtn = document.querySelectorAll('.study__btn');

let buyPop = document.querySelector('.buy__pop-up');

//ПОЛУЧАЕМ ФОРМУ
let buyForm = document.querySelectorAll('.buy__form');

buyBtn.forEach((currentBtn, index) => {
    currentBtn.addEventListener('click',  () => {
        buyPop.classList.add('buy__pop-up--active');
        for (let i = 0; i < buyForm.length; i++) {
            let buyData = buyForm[i].getAttribute('data-form');
            if (index == buyData) {
                buyForm[buyData].classList.add('buy__form--active');
                // body.classList.add('overflowHidden');
            } else {
                buyForm[i].classList.remove('buy__form--active');
            }
        }
    })
});


buyPop.addEventListener('click', (event)=>{
    if(event.target.classList.contains('buy__pop-up')) {
        buyPop.classList.remove('buy__pop-up--active');
    }
})




// let bonusBtn = document.querySelectorAll('.one__content-btn');
// let bonusPop = document.querySelector('.bonus__pop-up');
//
// bonusBtn.forEach((currentBtn) => {
//     currentBtn.addEventListener('click', ()=> {
//         bonusPop.classList.add('bonus__pop-up--active');
//     })
// })
//
//
// bonusPop.addEventListener('click', (event)=>{
//     if(event.target.classList.contains('bonus__pop-up')) {
//         bonusPop.classList.remove('bonus__pop-up--active');
//     }
// })
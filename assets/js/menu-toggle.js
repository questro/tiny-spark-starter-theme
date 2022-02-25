
/**
 * TODOS: 
 * bug: when desktop screen is opened and then resized to mobile, btn no longer works at all.
 *  add aria changes on click
 *  other accessibility features
 *  css interactions for accessibility and walker states 
 *  debounce for resize event
 *  split things up into functions for clarity: const within es6 function?
 *  slide in animation 
 *  DONE: add event listener for close btn
 */


// DOM Content must be loaded to attach eventListeners to elements 
document.addEventListener('DOMContentLoaded', () =>  {
   const toggleBtn = document.querySelector('#nav-toggle-btn')
   const mobileMenu = document.querySelector('.mobile-menu')
   const mobileMenuList = document.querySelector('.mobile-menu > .menu-item')


   let width = window.innerWidth;
    if( width < 1000 && toggleBtn ) {

      toggleBtn.addEventListener('click', function(){
        
        mobileMenu.classList.toggle('is-visible')
        

        // if mobile menu wrapper already has a close Btn, remove it
        // if ( closeBtn === true ) {
        //   closeBtn.remove()
        // }

        // add close Btn  (change this to replace button toggle Open in DOM )
        let closeBtn = document.createElement('li')
        closeBtn.classList.add('close-btn-toggle')
        closeBtn.innerText = 'Close'
        mobileMenuList.insertAdjacentElement('beforebegin', closeBtn)

        // listen for close Btn click and remove close Btn
        closeBtn.addEventListener('click', () => {
          closeBtn.remove()
          mobileMenu.classList.toggle('is-visible')
        } )

      })
    }

    // When mobile menu is opened and window is resized to > 1000px 
    // close the mobile menu
    window.addEventListener('resize', () => {
      
      let width = window.innerWidth
      let mobileMenuOpen = mobileMenu.classList.contains('is-visible')
      if (width >= 1000 && mobileMenuOpen === true) {
       mobileMenu.classList.remove('is-visible')
      }

    })


}, false);

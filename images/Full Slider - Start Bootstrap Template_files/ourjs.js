


window.smoothScroll = function(target) {
    var scrollContainer = target;
    var v=1;
    var reply_click = function()
    {
        if(this.id == "btn_a"){
            v=0;
        }else if(this.id == "btn_b"){
            v=1;
        }
    }
   

    do { //find scroll container
        scrollContainer = scrollContainer.parentNode;
        if (!scrollContainer) return;
        scrollContainer.scrollTop += 1;
    } while (scrollContainer.scrollTop == 0);

    var targetY = 0;
    do { //find the top of target relatively to the container
        if (target == scrollContainer) break;
        targetY += target.offsetTop;
    } while (target = target.offsetParent);

    scroll = function(c, a, b, i) {
        i++; if (i > 30) return;
        if(v==0){c.scrollTop = a + (b - a) / 32.2 * i;}
        else if(v==1){c.scrollTop = a + (b - a) / 35 * i;}
        setTimeout(function(){ scroll(c, a, b, i); }, 10);
    }
    // start scrolling
    scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0);
}



$(document).ready(function(){
    $('.dropdown-submenu a.test').on("click", function(e){
      $(this).next('ul').toggle();
      e.stopPropagation();
      e.preventDefault();
    });
  });


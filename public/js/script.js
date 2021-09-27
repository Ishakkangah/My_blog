$(document).ready(function() {
    var typed = new Typed(".display-4", {
        strings: ['Welcome My Blog', 'I am Ishakk angah', 'Web development,I am a blogger, Freelancer'],
        typeSpeed: 70,
        backSpeed: 50,
        loop: true
    });

    const txtElement = ['"You have time but limited, so make your time for yourself, do not waste for the others life." – Steve Jobs'];
    let count = 0;
    let txtIndex = 0;
    let currentTxt = '';
    let word = '';

    (function ngetik(){
        if(count == txtElement.length){
            count = 0;
        }

        currentTxt = txtElement[count];
    
        words = currentTxt.slice(0, ++txtIndex);
        document.querySelector('.efek-ngetik').textContent = words;

        if(words.length == currentTxt.length){
            count++;
            txtIndex = 0;
        }
        setTimeout(ngetik, 100);
    })();
});



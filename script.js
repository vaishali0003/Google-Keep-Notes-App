darkMode = localStorage.getItem('darkMode');

flag = true;
document.querySelector('.searchIcon').addEventListener('click', function (e) {
    if (flag) {
        document.querySelector('.searchbar').style.display = 'block'
        flag = false;
    }
    else {
        document.querySelector('.searchbar').style.display = 'none'
        flag = true;
    }
})

document.querySelector('.icon1').addEventListener('click', function (e) {
    if(flag){
    document.querySelector('.leftBox').style.width = '280px';
    document.querySelector('.leftBox').style.zIndex = '100';
    document.querySelector('.rightBox').style.zIndex = '-1';
    document.querySelector('.leftBox').style.boxShadow = '0px 15px 9px rgb(0 0 0 / 32%)';
    menuNames = document.querySelectorAll('.menu-name');
    for (i of menuNames) {
        i.style.opacity = '1';
    }
    flag=false;
    }

    else{
            document.querySelector('.leftBox').style.width = '50px';
            document.querySelector('.leftBox').style.zIndex = '-1';
            document.querySelector('.rightBox').style.zIndex = '100';
            document.querySelector('.leftBox').style.boxShadow = 'none';
            menuNames = document.querySelectorAll('.menu-name');
            for (i of menuNames) {
                i.style.opacity = '0';
            }
            flag=true;
    }
});


    document.querySelector('.leftBox').addEventListener('mouseover', function (e) {
        if (window.innerWidth>450) {
            document.querySelector('.leftBox').style.width = '280px';
            document.querySelector('.rightBox').style.zIndex = '-1';
            document.querySelector('.leftBox').style.boxShadow = '0px 15px 9px rgb(0 0 0 / 32%)';
            menuNames = document.querySelectorAll('.menu-name');
            for (i of menuNames) {
                i.style.opacity = '1';
            }
        }
    });
    document.querySelector('.leftBox').addEventListener('mouseleave', function (e) {
        if (window.innerWidth>450) {
            document.querySelector('.leftBox').style.width = '50px';
            document.querySelector('.rightBox').style.zIndex = '100';
            document.querySelector('.leftBox').style.boxShadow = 'none';
            menuNames = document.querySelectorAll('.menu-name');
            for (i of menuNames) {
                i.style.opacity = '0';
            }
        }
    });

    
document.querySelector('.login').addEventListener('click', function () {
    document.querySelector('.cred-main').style.opacity = '1';
})

window.addEventListener('mouseup', (e) => {
    if (!document.querySelector('.cred-main').contains(e.target)) {
        document.querySelector('.cred-main').style.opacity = '0';
    }
})

if (document.querySelector('.SignUp1') != undefined) {
    document.querySelector('.SignUp1').addEventListener('click', function () {
        document.querySelector('.signupForm').style.opacity = '1';
        document.querySelector('.signupForm').style.zIndex = '302';
    })
}

document.querySelector('.smallBox').addEventListener('click', function (e) {
    document.querySelector('.bigBox').style.display = 'block';
    document.querySelector('.smallBox').style.display = 'none';
})

window.addEventListener('mouseup', (e) => {
    if (!document.querySelector('.bigBox').contains(e.target)) {
        document.querySelector('.bigBox').style.display = 'none';
        document.querySelector('.smallBox').style.display = 'block';
    }
})

document.querySelector('.change-color').addEventListener('click', function (e) {
    document.querySelector('.colorPalette').style.display = 'flex';
})

window.addEventListener('mouseup', (e) => {
    if (!document.querySelector('.colorPalette').contains(e.target)) {
        document.querySelector('.colorPalette').style.display = 'none';
    }
})


bigBox = document.querySelector('.bigBox');
Title = document.querySelectorAll('.title');
Description = document.querySelectorAll('.description');
colors = document.querySelectorAll('.color');
for (i of colors) {
    i.addEventListener('click', function (e) {
        e.target.classList.add('active');
        newBg = document.querySelector('.active').id;
        bigBox.style.backgroundColor = newBg;
        for (i of Title) {
            i.style.backgroundColor = newBg;
        }
        for (i of Description) {
            i.style.backgroundColor = newBg
        }

        bgColors = document.querySelectorAll('.bgColor');
        for (i of bgColors) {
            i.id = document.querySelector('.active').id;
            i.value = document.querySelector('.active').id;
        }
        document.querySelector('.active').classList.remove('active');
    })
}

noteCards = document.querySelectorAll('.notecard');
for (i of noteCards) {
    i.style.backgroundColor = i.classList[1];
    i.style.border = "2px solid " + i.classList[1];
}


search = document.getElementById('searchTxt');
l = 0;
search.addEventListener('input', function () {
    inputVal = search.value;
    inputVal = inputVal.toLowerCase();
    noteCards = document.querySelectorAll('.notecard');
    for (i = 0; i < noteCards.length; i++) {
        if (noteCards[i].innerHTML.toLowerCase().includes(inputVal)) {
            noteCards[i].style.display = 'block';
        }
        else {
            noteCards[i].style.display = 'none';
        }
    }
})
document.querySelector('.searchIcon').addEventListener('click', function (e) {

})

edits = document.getElementsByClassName('edit');
for (i of edits) {
    i.addEventListener('click', function (e) {
        title = e.target.parentNode.parentNode.parentNode.children[0].innerText;
        description = e.target.parentNode.parentNode.parentNode.children[1].innerText;
        document.getElementById('titleEdit').value = title;
        document.getElementById('descriptionEdit').value = description;
        document.getElementById('snoEdit').value = e.target.id;
    })
}

deletes = document.getElementsByClassName('delete');
for (i of deletes) {
    i.addEventListener('click', function (e) {
        sno = e.target.id;
        sno = e.target.id.substr(1,);
        if (confirm("Are you sure you want to delete this note?")) {
            window.location = `index.php?delete=${sno}`;
        }
    })
}

checkbox = document.getElementById('checkbox');
checkbox.addEventListener('change', changeDarkMode);

if (localStorage.getItem('darkMode') == 'true') {
    checkbox.checked = true;
    darkMode1();
}

function changeDarkMode() {
    if (checkbox.checked) {
        darkMode1();
    }
    else {
        lightMode();
    }
}

function lightMode() {
    document.body.classList.remove('dark');
    document.querySelector('.navbar').classList.remove('navbarDark');
    document.querySelector('.logo').classList.remove('logoDark');
    document.querySelector('.hamImg').classList.remove('hamImgDark');
    if (document.querySelector('.rLogin1') != undefined) {
        document.querySelector('.rLogin1').classList.remove('rLogin1Dark');
    }
    document.querySelector('.title').classList.remove('darkMode');
    document.querySelector('.description').classList.remove('darkMode');
    if (document.querySelector('.search') != undefined) {
        document.querySelector('.search').classList.remove('searchDark');
    }
    document.querySelector('.title1').classList.remove('title1Dark');
    document.querySelector('.leftBox').classList.remove('leftBoxDark');

    menuNames = document.querySelectorAll('.menu-name');
    for (i of menuNames) {
        i.classList.remove('menu-nameDark');
    }

    document.querySelector('.menu-name').classList.remove('menu-nameDark');

    document.querySelector('.icon1').classList.remove('icon1dark');
    icons = document.querySelectorAll('.icon');
    for (i of icons) {
        i.classList.remove('iconDark');
    }
    titles = document.querySelectorAll('.title');
    for (i of titles) {
        i.classList.remove('titleDark');
    }
    descriptions = document.querySelectorAll('.description');
    for (i of descriptions) {
        i.classList.remove('descriptionDark');
    }

    document.querySelector('.smallBox').classList.remove('smallboxDark');
    document.querySelector('.bigBox').classList.remove('bigboxDark');
    nT = document.querySelectorAll('.noteTitle');
    for (i of nT) {
        i.classList.toggle('noteTitleDark');
    }
    dT = document.querySelectorAll('.noteDescription');
    for (i of dT) {
        i.classList.remove('noteDescriptionDark');
    }
    id2 = document.querySelectorAll('.id2');
    for (i of id2) {
        i.classList.toggle('id1');
        i.classList.remove('id2');
    }
    document.querySelector('.modal-content').classList.remove('editModalDark');
    document.querySelector('.modal-content').removeAttribute('id');
    document.querySelector('.modal-header').removeAttribute('id');
    if (document.querySelector('.bulb') != undefined) {
        document.querySelector('.bulb').classList.remove('bulbDark');
    }

    notecards = document.querySelectorAll('.notecard');
    for (i of notecards) {
        i.classList.toggle('notecardLight');
        i.classList.remove('notecardDark');
    }
    closeBtn = document.querySelectorAll('.closebtn');
    for (i of closeBtn) {
        i.classList.remove('closebtnDark');
    }
    document.querySelector('.editingIcons1').classList.remove('editingIcons1Dark');
    editingIcons = document.querySelectorAll('.editingIcon2');
    for (i of editingIcons) {
        i.classList.remove('editingIcon2Dark');
    }
    document.querySelector('.colorPalette').classList.add('colorPaletteLight')
    document.querySelector('.colorPalette').classList.remove('colorPaletteDark')

    if (document.querySelector('.loginForm') != undefined) {
        document.querySelector('.loginForm').classList.remove('loginFormDark');
    }
    if (document.querySelector('.signupForm') != undefined) {
        document.querySelector('.signupForm').classList.remove('signupFormDark');
    }
    if (document.querySelector('.logoutForm') != undefined) {
        document.querySelector('.logoutForm').classList.remove('logoutFormDark');
    }
    if (document.querySelector('.searchIcon') != undefined) {
        document.querySelector('.searchIcon').classList.remove('searchIconDark');
    }
    document.querySelector('.closebtn').classList.remove('closebtnDark');
    localStorage.setItem('darkMode', 'false');
}
function darkMode1() {
    document.body.classList.toggle('dark');
    document.querySelector('.navbar').classList.toggle('navbarDark');
    document.querySelector('.logo').classList.toggle('logoDark');
    document.querySelector('.hamImg').classList.toggle('hamImgDark');
    if (document.querySelector('.rLogin1') != undefined) {
        document.querySelector('.rLogin1').classList.toggle('rLogin1Dark');
    }
    if (document.querySelector('.bulb') != undefined) {
        document.querySelector('.bulb').classList.toggle('bulbDark');
    }
    document.querySelector('.title').classList.toggle('darkMode');
    document.querySelector('.description').classList.toggle('darkMode');
    if (document.querySelector('.search') != undefined) {
        document.querySelector('.search').classList.toggle('searchDark');
    }
    document.querySelector('.title1').classList.toggle('title1Dark');
    document.querySelector('.leftBox').classList.toggle('leftBoxDark');

    menuNames = document.querySelectorAll('.menu-name');
    for (i of menuNames) {
        i.classList.toggle('menu-nameDark');
    }
    document.querySelector('.icon1').classList.toggle('icon1dark');
    icons = document.querySelectorAll('.icon');
    for (i of icons) {
        i.classList.toggle('iconDark');
    }
    titles = document.querySelectorAll('.title');
    for (i of titles) {
        i.classList.toggle('titleDark');
    }
    descriptions = document.querySelectorAll('.description');
    for (i of descriptions) {
        i.classList.toggle('descriptionDark');
    }
    ed = document.querySelectorAll('.editingIcon');
    for (i of ed) {
        i.classList.toggle('editingIconDark');
    }
    document.querySelector('.smallBox').classList.toggle('smallboxDark');
    document.querySelector('.bigBox').classList.toggle('bigboxDark');
    nT = document.querySelectorAll('.noteTitle');
    for (i of nT) {
        i.classList.toggle('noteTitleDark');
    }
    dT = document.querySelectorAll('.noteDescription');
    for (i of dT) {
        i.classList.toggle('noteDescriptionDark');
    }
    id1 = document.querySelectorAll('.id1');
    for (i of id1) {
        i.classList.remove('id1');
        i.classList.toggle('id2');
    }
    closeBtn = document.querySelectorAll('.closebtn');
    for (i of closeBtn) {
        i.classList.toggle('closebtnDark');
    }
    document.querySelector('.modal-content').classList.toggle('editModalDark');
    document.querySelector('.modal-content').id = 'modalEdit';
    document.querySelector('.modal-header').id = 'modalHead';
    notecards = document.querySelectorAll('.notecard');
    for (i of notecards) {
        i.classList.remove('notecardLight');
        i.classList.toggle('notecardDark');
    }
    
    document.querySelector('.editingIcons1').classList.toggle('editingIcons1Dark');
    editingIcons = document.querySelectorAll('.editingIcon2');
    for (i of editingIcons) {
        i.classList.toggle('editingIcon2Dark');
    }
    document.querySelector('.colorPalette').classList.remove('colorPaletteLight')
    document.querySelector('.colorPalette').classList.toggle('colorPaletteDark')
    if (document.querySelector('.loginForm') != undefined) {
        document.querySelector('.loginForm').classList.toggle('loginFormDark');
    }
    if (document.querySelector('.signupForm') != undefined) {
        document.querySelector('.signupForm').classList.toggle('signupFormDark');
    }
    if (document.querySelector('.logoutForm') != undefined) {
        document.querySelector('.logoutForm').classList.toggle('logoutFormDark');
    }
    if (document.querySelector('.searchIcon') != undefined) {
        document.querySelector('.searchIcon').classList.toggle('searchIconDark');
    }
    document.querySelector('.closebtn').classList.toggle('closebtnDark');
    localStorage.setItem('darkMode', 'true');
}
let check = document.querySelector("#check");

check.addEventListener("click", ()=>{
    let present = document.querySelectorAll(".present:checked").length;
    let leave = document.querySelectorAll(".leave:checked").length;
    let absent = document.querySelectorAll(".absent:checked").length;
    let late = document.querySelectorAll(".late:checked").length;
    let Schoollate = document.querySelectorAll(".Schoollate:checked").length;
    let act = document.querySelectorAll(".act:checked").length;

    let showPresent = document.querySelector('#showPresent');
    let showLeave = document.querySelector('#showLeave');
    let showAbsent = document.querySelector('#showAbsent');
    let showLate = document.querySelector('#showLate');
    let showSchoolLate = document.querySelector('#showSchoolLate');
    let showAct = document.querySelector('#showAct');
    let showRow = document.querySelector('#showRow');

    showRow.classList.add('g-2');

    showPresent.innerHTML = 'มา ' + present + ' คน';
    showLeave.innerHTML = 'ลา ' + leave + ' คน';
    showAbsent.innerHTML = 'ขาด ' + absent + ' คน';
    showLate.innerHTML = 'สายโฮมรูม ' + late + ' คน';
    showSchoolLate.innerHTML = 'สายรร. ' + Schoollate + ' คน';
    showAct.innerHTML = 'กิจกรรม ' + act + ' คน';

    console.log('Present ' + present);
    console.log('Leave ' + leave);
    console.log('Absent ' + absent);
    console.log('Absent ' + late);
}
);
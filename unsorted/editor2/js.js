window.onload = function() {
  main_js();
};

function main_js()
{


inst1 = new Styled_object;
//console.log('1. inst1.exist: '+inst1.exist)
//console.log('2. inst1.testfn: '+inst1.testfn())

//console.log('static and dynamic')
//console.log('3. inst1.static1: '+inst1.static1)
//inst2 = new Styled_object;
//console.log('4. inst2.static1: '+inst2.static1)

//console.log('changing static by inst1')
//inst1.static1 = 'static1 changed'
//console.log('-- inst1.static1: '+inst1.static1)

//console.log('checking static by inst2')
//console.log('4. inst2.static1: '+inst2.static1)

styled_div = document.getElementsByClassName('styled')[0];

form = styled_div.getElementsByTagName("form")[0];
function handleForm(event) { event.preventDefault(); } 
form.addEventListener('submit', handleForm);

code = document.getElementsByClassName('code')[0];
preview = document.getElementsByClassName('preview')[0];
preview.innerHTML = code.value;
sumbit=styled_div.getElementsByClassName('subm')[0];
sumbit.onclick = function()
{
	console.log('submitted'); preview.innerHTML = code.value;
	

};
preview.contentEditable = true;
}

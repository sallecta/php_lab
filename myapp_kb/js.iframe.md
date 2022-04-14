# About
https://stackoverflow.com/questions/15029790/how-to-interact-with-the-content-of-an-iframe-using-js-or-jquery
https://stackoverflow.com/a/15029895


# Author


## Barney
https://stackoverflow.com/users/356541/barney

```javascript
	
/*
Different iframes have different contexts and documents: when you invoke $('#btnInside'), jQuery is executing in the host iframe and looking in that document, so it can't find it. If the nested iframe is on the same server though, you can tunnel through to its document from the host document:
*/

$(document).ready(function()
{
	$("#btnOutside").click(function () 
	{
		$('iframe[src="other.html"]').contents().find("#btnInside").click();
	});
});

```

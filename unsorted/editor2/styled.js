function Styled_object(){}

Styled_object.static = function(arg_property, arg_value)
{
// Static (shared) properties across object and it's instances
	if (arg_value !== undefined) { Styled_object[arg_property] = arg_value;}
	Object.defineProperty
	(
		Styled_object.prototype, arg_property,
		{
			get: function() { return Styled_object[arg_property]; },
			set: function(newValue) { Styled_object[arg_property] = newValue; }
		}
	);
};

Styled_object.dynamic = function(arg_property, arg_value)
{
// Dynamic (unique) properties per instance of object
	Styled_object.prototype[arg_property] = arg_value;
};



Styled_object.static('static1','original value');
Styled_object.dynamic('exist', 'yes');
Styled_object.dynamic('testfn', function(){ return "testfn() result"; });




window.onhashchange = function ()
{
	ui1.onload_and_onchange();
};

window.onload = function()
{
	ui1.onload_and_onchange();
};
	
class ui1 {
	static tab_id = '';
	static tabs_instance = '';
	
	static onload_and_onchange() 
	{
		ui1.tab_id = window.location.hash.substring(1);
		ui1.tabs_instance = "ui1_tabs_instance_"+ui1.tab_id.split("_")[0];
		ui1.tab_disable();
		ui1.tab_enable();
	} // end onload_and_onchange
	
	static tab_disable() 
	{
		var ui1_tabs_instances, i, tabs;
		ui1_tabs_instances = document.getElementsByClassName(this.tabs_instance);
		for (i = 0; i < ui1_tabs_instances.length; i++) 
		{
			var active_tabs, j;
			active_tabs = ui1_tabs_instances[i].getElementsByClassName("active");
			for (j = 0; j < active_tabs.length; j++)
			{
				active_tabs[j].className = active_tabs[j].className.replace("active", "");
			}
			var enabled_contents, k;
			enabled_contents = ui1_tabs_instances[i].getElementsByClassName("tabcontent");
			for (k = 0; k < enabled_contents.length; k++)
			{
				enabled_contents[k].style.display = "none";
			}
		}
	} // end tab_disable
	
	static tab_enable() 
	{
		document.getElementById(this.tab_id).style.display = "block";
		document.getElementById("tablink_"+this.tab_id).className += " active";
	} // end tab_enable
}


  

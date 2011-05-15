function GetXmlHttpObject()
{
	var xmlHttp=null;
	
	try
	{
	// Firefox, Opera 8.0+, Safari
		xmlHttp=new XMLHttpRequest();
	}
	catch (e)
	{
		// Internet Explorer
		try
		{
		xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e)
		{
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}

function addImage()
{
	newDiv = document.createElement("div");
	
	str = "<div style='width:100px; float: left;'>Image : </div><div style='float:left;'>";
	str += "<input type='file' name='image[]' class='file' /></div><br style='clear: both;'>";
	str += "<div style='width:100px; float: left;'>Caption : </div>";
	str += "<div style='float:left;'><input type='text' name='imageCaption[]' class='text' /></div>";
	str += "<br style='clear: both;'><div style='width:100px; float: left;'>Link : </div>";
	str += "<div style='float:left;'> <input type='text' name='imageLink[]' class='text' /></div>";
	str += "<br style='clear: both;'><div style='width:100px; float: left;'>Position : </div>";
	str += "<div style='float:left;'>  <select name='imagePosition[]'><option value='B'>Bottom</option><option value='T'>Top</option></select></div>";
	str += "<hr style='clear: both;'>";

	newDiv.innerHTML = str;

	document.getElementById('uploadImageHolder').appendChild(newDiv);
}
function addLisitng()
{
	newDiv = document.createElement("div");
	
	str = "<div style='width:100px; float: left;'>Start Date : </div><div style='float:left;'>";
	str += "<input type='text' name='startDate[]' class='text' /></div><br style='clear: both;'>";
	str += "<div style='width:100px; float: left;'>End Date : </div>";
	str += "<div style='float:left;'><input type='text' name='endDate[]' class='text' /></div>";
	str += "<br style='clear: both;'><div style='width:100px; float: left;'>Price: </div>";
	str += "<div style='float:left;'> <input type='text' name='price_doller[]' class='text' /></div>";
	str += "<br style='clear: both;'><div style='width:100px; float: left;'>Discount: </div>";
	str += "<div style='float:left;'> <textarea name='discount[]' class='text' rows='3' cols='25'></textarea></div>";
	str += "<br style='clear: both;'><div style='width:100px; float: left;'>Availability: </div>";
	str += "<div style='float:left;'><select name='avibility[]'><option value='OPENED'>Opened</option><option value='CLOSED'>Closed</option><option value='GURENTED'>Gurented</option><option value='LIMITED'>Closed</option></select></div>";
	str += "<hr style='clear: both;'><br />";

	newDiv.innerHTML = str;

	document.getElementById('addListing').appendChild(newDiv);
}
						
function addListFile()
{
	newDiv = document.createElement("div");
	
	str = "<div style='width:100px; float: left;'>File : </div><div style='float:left;'>";
	str += "<input type='file' name='listFile[]' class='file' /></div><br style='clear: both;'>";
	str += "<div style='width:100px; float: left;'>Caption : </div>";
	str += "<div style='float:left;'><input type='text' name='listCaption[]' class='text' /></div>";
	str += "<hr style='clear: both;'>";

	newDiv.innerHTML = str;

	document.getElementById('uploadFileHolder').appendChild(newDiv);
}

function addVideo()
{
	newDiv = document.createElement("div");
	
	str = "<div style='width:100px; float: left;'>Title : </div><div style='float:left;'>";
	str += "<input type='text' name='videoTitle[]' class='text' /></div><br style='clear: both;'>";
	str += "<div style='width:100px; float: left;'>Link : </div>";
	str += "<div style='float:left;'><input type='text' name='videoUrl[]' class='text' /></div>";
	str += "<hr style='clear: both;'>";

	newDiv.innerHTML = str;

	document.getElementById('uploadVideoHolder').appendChild(newDiv);
}

function changeType(box)
{
	location.href = "cms.php?groupType=" + box.value;
}

function getAndPut(url, intoDiv)
{
	xmlHttp = GetXmlHttpObject();
	
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4)
		{ 
			intoDiv.innerHTML = xmlHttp.responseText;
			if(url == "ajaxNormalGroup.php" || url == "ajaxContentsPanel.php")
			{ 
				CKEDITOR.replace('shortcontents');
				CKEDITOR.replace('contents');
			}
			else if(url == "ajaxLinkPage.php")
			{ 
				CKEDITOR.replace('shortcontents');

			}
			else if(url == "ajaxTripContentsPanel.php")
			{ 
				CKEDITOR.replace('shortcontents');
				CKEDITOR.replace('contents');
				CKEDITOR.replace('overview');
				CKEDITOR.replace('itinerary');
				CKEDITOR.replace('routemap');
				
			}
			else if(url == "ajaxListingPanel.php")
				CKEDITOR.replace('listDescription');
		}
	};
	xmlHttp.open("GET",url,true);

	xmlHttp.send(null);
}

function changeLinkType(sbox)
{

	

	document.getElementById('uploadFile').disabled = true;


	document.getElementById('uploadFile').style.display = 'none';

	document.getElementById('fckEditor').style.display = 'none';
	document.getElementById('fckEditors').style.display = 'none';

	document.getElementById('galleryDiv').style.display = 'none';

	document.getElementById('listDiv').style.display = 'none';
	
	document.getElementById('normalGroupDiv').style.display = 'none';	
	
	document.getElementById('videoGalleryDiv').style.display = 'none';
	
	document.getElementById('pageDetails').style.display = 'none';

	document.getElementById('contentsLabel').innerHTML = '';
	document.getElementById('contentsLabel').style.display = 'none';
	//document.getElementById('ImageLabel').style.display = 'none';
	//document.getElementById('grpImage').style.display= 'none';
	parId = document.getElementById('parentIds').value;

	if(sbox.value == "Link")
	{
		document.getElementById('fckEditors').style.display = 'block';
		
		myDiv = document.getElementById('fckEditors');
		myDiv.style.display = 'block';

		getAndPut("ajaxLinkPage.php", myDiv);
		document.getElementById('contentsLabel').innerHTML = 'Put your contents';
		document.getElementById('contentsLabel').style.display = 'block';
	}
	else if(sbox.value == "Normal Group")
	{
		document.getElementById('pageDetails').style.display = 'block';
		
		myDiv = document.getElementById('normalGroupDiv');
		myDiv.style.display = 'block';

		getAndPut("ajaxNormalGroup.php", myDiv);
		document.getElementById('contentsLabel').innerHTML = 'Put your contents';
		document.getElementById('contentsLabel').style.display = 'block';
		
		//document.getElementById('ImageLabel').style.display = 'block';
		//document.getElementById('grpImage').style.display= 'block';		
	}

	else if(sbox.value == "File")
	{
		myDiv = document.getElementById('uploadFile');
		myDiv.disabled = false;
		myDiv.style.display = 'block';

		document.getElementById('contentsLabel').innerHTML = 'Upload a file';
		document.getElementById('contentsLabel').style.display = 'block';
	}
	else if(sbox.value == "Contents Page")
	{
		document.getElementById('pageDetails').style.display = 'block';
		
		myDiv = document.getElementById('fckEditor');
		myDiv.style.display = 'block';
		getAndPut("ajaxContentsPanel.php", myDiv);
		document.getElementById('contentsLabel').innerHTML = 'Put your contents';
		document.getElementById('contentsLabel').style.display = 'block';
		
		//document.getElementById('ImageLabel').style.display = 'block';
		//document.getElementById('grpImage').style.display= 'block';
	}
	
	else if(sbox.value == "Trips Page")
	{
		document.getElementById('pageDetails').style.display = 'block';
		
		myDiv = document.getElementById('fckEditor');
		myDiv.style.display = 'block';
		getAndPut("ajaxTripContentsPanel.php", myDiv);
		document.getElementById('contentsLabel').innerHTML = 'Put your details for Trip Page';
		document.getElementById('contentsLabel').style.display = 'block';
		
		//document.getElementById('ImageLabel').style.display = 'block';
		//document.getElementById('grpImage').style.display= 'block';
	}
	
	else if(sbox.value == "Gallery")
	{
		document.getElementById('pageDetails').style.display = 'block';
		
		myDiv = document.getElementById('galleryDiv');

		myDiv.style.display = 'block';

		getAndPut("ajaxGalleryPanel.php", myDiv);

		//document.getElementById('contentsLabel').innerHTML = 'Create your gallery';
	}
	else if(sbox.value == "List")
	{
		document.getElementById('pageDetails').style.display = 'block';
		
		myDiv = document.getElementById('listDiv');

		myDiv.style.display = 'block';

		getAndPut("ajaxListingPanel.php", myDiv);

		//document.getElementById('contentsLabel').innerHTML = 'Create your gallery';
	}
	else if(sbox.value == "Video Gallery")
	{
		document.getElementById('pageDetails').style.display = 'block';
		
		myDiv = document.getElementById('videoGalleryDiv');

		myDiv.style.display = 'block';

		getAndPut("ajaxVideoGalleryPanel.php", myDiv);

		//document.getElementById('contentsLabel').innerHTML = 'Create your gallery';
	}
}

function delete_confirmation(query)
{
	if(confirm("Are you sure you want to delete?"))
	{
		location.href = query;	
	}
	return false;
}

function copySame(divId, value)
{
	xmlHttp = GetXmlHttpObject();
	
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4)
		{ 
		
			document.getElementById(divId).value = xmlHttp.responseText;
		}
	};
	xmlHttp.open("GET",'formaturl.php?value='+ value,true);

	xmlHttp.send(null);
}
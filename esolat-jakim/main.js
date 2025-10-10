//url = "https://www.e-solat.gov.my/index.php?r=esolatApi/TakwimSolat&period=today&zone=KTN02";
//baseurl = "https://www.e-solat.gov.my/index.php?r=esolatApi/TakwimSolat";
//pp = JSON.parse('https://www.e-solat.gov.my/index.php?r=esolatApi/TakwimSolat&period=today&zone=KTN02');
title = document.getElementById('title');
const code = document.getElementById('code');
const output = document.getElementById('output');
const select = document.getElementById("zone");
async function getPrayerTimes(zone) {
	baseurl  = "https://www.e-solat.gov.my/index.php?r=esolatApi/TakwimSolat&period=today"
  	baseurl += "&zone="+zone;
  	js = `
  	url = 'https://www.e-solat.gov.my/index.php?r=esolatApi/TakwimSolat&period=today&zone=${zone}';
  	fetch(url).response => response.json())
  		.then(data =>{

  		})
  		.catch(error => console.error("Error:", error);
  	`;
  	fetch(baseurl)
    	.then(response => response.json())
      	.then(data => {
        	// Display the full JSON object, formatted nicely
        	title.innerHTML = data.zone;
        	code.textContent = js;
        	output.textContent = JSON.stringify(data, null, 2);
      	})
      	.catch(error => {
        	console.error("Fetch error:", error);
        	output.textContent = "Error fetching data.";
      	});
}
select.addEventListener("change", function () {
	const selectedZone = this.value;
	console.log(selectedZone);
	getPrayerTimes(this.value);
    //fetchPrayerTimes(selectedZone);
});
//getPrayerTimes("KTN02");


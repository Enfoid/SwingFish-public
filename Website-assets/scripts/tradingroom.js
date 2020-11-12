function LoadCbe1() {
	var timeStamp = new Date().getTime();
	$.ajax({ 
		url : '/lib/3rd/discord/tradingroom.json.php?tn='+timeStamp, 
		dataType : 'json', 
		success : function(data){ 
			$('#cbe1D0a').attr('src', data[0].avatar).show(100);$('#cbe1D0n').html(data[0].nick).show(100);$('#cbe1D0b').html(data[0].body).show(100);
			$('#cbe1D1a').attr('src', data[1].avatar).show(200);$('#cbe1D1n').html(data[1].nick).show(200);$('#cbe1D1b').html(data[1].body).show(200);
			$('#cbe1D2a').attr('src', data[2].avatar).show(400);$('#cbe1D2n').html(data[2].nick).show(400);$('#cbe1D2b').html(data[2].body).show(400);
			$('#cbe1D3a').attr('src', data[3].avatar).show(800);$('#cbe1D3n').html(data[3].nick).show(800);$('#cbe1D3b').html(data[3].body).show(800);
			$('#cbe1D4a').attr('src', data[4].avatar).show(1600);$('#cbe1D4n').html(data[4].nick).show(1600);$('#cbe1D4b').html(data[4].body).show(1600);
			$('#cbe1D5a').attr('src', data[5].avatar).show(3200);$('#cbe1D5n').html(data[5].nick).show(3200);$('#cbe1D5b').html(data[5].body).show(3200);
			$('#cbe1D6a').attr('src', data[6].avatar).show(6400);$('#cbe1D6n').html(data[6].nick).show(6400);$('#cbe1D6b').html(data[6].body).show(6400);
			$('#cbe1D7a').attr('src', data[7].avatar).show(12800);$('#cbe1D7n').html(data[7].nick).show(12800);$('#cbe1D7b').html(data[7].body).show(12800);
			$('#cbe1D8a').attr('src', data[8].avatar).show(12800);$('#cbe1D8n').html(data[8].nick).show(12800);$('#cbe1D8b').html(data[8].body).show(12800);
			$('#cbe1D9a').attr('src', data[9].avatar).show(12800);$('#cbe1D9n').html(data[9].nick).show(12800);$('#cbe1D9b').html(data[9].body).show(12800);
			$('#cbe1D10a').attr('src', data[10].avatar).show(12800);$('#cbe1D10n').html(data[10].nick).show(12800);$('#cbe1D10b').html(data[10].body).show(12800);
			$('#cbe1D11a').attr('src', data[11].avatar).show(12800);$('#cbe1D11n').html(data[11].nick).show(12800);$('#cbe1D11b').html(data[11].body).show(12800);
			$('#cbe1D12a').attr('src', data[12].avatar).show(12800);$('#cbe1D12n').html(data[12].nick).show(12800);$('#cbe1D12b').html(data[12].body).show(12800);
			$('#cbe1D13a').attr('src', data[13].avatar).show(12800);$('#cbe1D13n').html(data[13].nick).show(12800);$('#cbe1D13b').html(data[13].body).show(12800);
			$('#cbe1D14a').attr('src', data[14].avatar).show(12800);$('#cbe1D14n').html(data[14].nick).show(12800);$('#cbe1D14b').html(data[14].body).show(12800);
			$('#cbe1D15a').attr('src', data[15].avatar).show(12800);$('#cbe1D15n').html(data[15].nick).show(12800);$('#cbe1D15b').html(data[15].body).show(12800);
			$('#cbe1D16a').attr('src', data[16].avatar).show(12800);$('#cbe1D16n').html(data[16].nick).show(12800);$('#cbe1D16b').html(data[16].body).show(12800);
			$('#cbe1D17a').attr('src', data[17].avatar).show(12800);$('#cbe1D17n').html(data[17].nick).show(12800);$('#cbe1D17b').html(data[17].body).show(12800);
			$('#cbe1D18a').attr('src', data[18].avatar).show(12800);$('#cbe1D18n').html(data[18].nick).show(12800);$('#cbe1D18b').html(data[18].body).show(12800);
			$('#cbe1D19a').attr('src', data[19].avatar).show(12800);$('#cbe1D19n').html(data[19].nick).show(12800);$('#cbe1D19b').html(data[19].body).show(12800);
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			$('#cbe1L').hide(500);
			$('#cbe1D').removeClass().addClass('error').text('There was an error.').show(500);
		}
	});
};

function reloadImages() {
  $('#webcama').attr('src', 'https://swingfish.trade/lib/ajax/cam261.php?dm=' + Math.random());
};

$(document).ready(function(){ 
	LoadCbe1();
	setInterval("LoadCbe1()",5000);
//	setInterval('reloadImages()', 6000); // 60 seconds
});

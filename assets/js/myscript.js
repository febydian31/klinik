$(function() {
	$('.tombolTambahUser').click(function() {
		$('#formModalLabelUser').html('Tambah Data User');
		$('.modal-footer button[type=submit]').html('Tambah');
	});

	$('.tombolUbahUser').click(function() {
		$('#formModalLabelUser').html('Ubah Data User');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action', 'http://localhost/klinik-ci-3/admin/users/ubahUser');

		const id = $(this).data('id');
		console.log(id);
		$.ajax({
			url: 'http://localhost/klinik-ci-3/admin/users/getuserid',
			method: 'post',
			dataType: 'json',
			data: {id: id},
			success: function(data)
			{
				console.log(data);
				$('#id_user').val(data.id_user);
				$('#nama').val(data.nama_lengkap);
				$('#username').val(data.username);
				$('#password').val(data.password);
			}
		});
	});


});
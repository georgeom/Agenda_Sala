<?php
	
	namespace App\Model;

	use Illuminate\Database\Eloquent\Model;

	class Agenda extends Model{

		protected $table = 'tb_agenda';

		protected $fillable = [
			'id_sala',
			'email_solicitante',
			'dt_inicio',
			'dt_termino',
			'situacao',
			'descricao'
		];

		protected $casts = [
			'dt_inicio' => 'Timestamp',
			'dt_termino' => 'Timestamp'
		];

		public $timestamps = false;
	}
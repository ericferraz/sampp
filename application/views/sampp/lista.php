<div class="content-wrapper">
	<section class="content-header clearfix">
		<h1 class="pull-left"><?= page_title($pageTitle) ?></h1>
		<a data-toggle="modal" data-target="#cadastro" class="btn btn-sm btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Adicionar novo</a>
	</section>
	<section class="content">	
		<div class="box box-primary">
			<div class="box-body">
				<ul class="nav nav-tabs" id="tabs">
					<li role="presentation" class="active"><a href="#home" data-toggle="tab">Cadastros</a></li>
					<li role="presentation"><a href="#filtro" data-toggle="tab">Pesquisar</a></li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped">
								<thead class="bg-primary">
									<tr>
										<th>Nome</th>
										<th>Diretório</th>
									</tr>
								</thead>
								<tbody><?php
									foreach($registros->registros AS $registro) {?>
										<tr data-click="<?= base_url('sampp/cadastro/'.encode($registro->id)) ?>">
											<td><i class="<?= $registro->icone ?>"></i> <?= $registro->label ?></td>
											<td><?= $registro->value ?></td>
										</tr><?php
									}?>
								</tbody>
							</table>
						</div>
						<?php $this->load->view('includes/pagination') ?>
					</div>
					<div role="tabpanel" class="tab-pane" id="filtro">
						<?= form_open(current_url(), array('method' => 'GET')); ?>
							<?php $this->load->view('sampp/filtro'); ?>
							<hr>
							<button type="submit" class="btn btn-sm btn-sm btn-primary"><i class="glyphicon glyphicon-search"></i> Pesquisar</button>
							<a href="<?= current_url() ?>" class="btn btn-sm btn-sm btn-default"><i class="glyphicon glyphicon-erase"></i> Limpar filtro</a>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<?=
modal_header('cadastro', 'Cadastrar módulo');
	echo form_open(null, array('data-action' => base_url('sampp/validate'))); ?>
		<div class='modal-body'>
			<?php $data['registro'] = null;
			$this->load->view('sampp/form', $data); ?>
		</div>
		<div class='modal-footer'>
			<button data-loading-text="Aguarde..." type="submit" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Gravar</button>
			<button class='btn btn-default' data-dismiss='modal'><i class='glyphicon glyphicon-remove'></i> Cancelar</button>
		</div>
		<?=
	form_close() .
modal_footer() ?>
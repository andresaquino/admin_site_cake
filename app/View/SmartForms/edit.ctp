<h1>Edit Smart Form</h1>

<p>&nbsp;</p>

<div id="form_table">

<?php echo $this->Form->create('SmartForm'); ?>
	<fieldset>
		<legend>Update Smart Form</legend>
		<p class="errorTip">All information must be entered</p>
		<table>
		<tbody>
			<tr><td>
				<?php echo $this->Form->input('name', array('label' => 'Smart Form Name: ')); ?>
				<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
			</td></tr>
			
			<tr><td>
				<?php echo $this->Form->input('sf_domain', array(
						'label' => 'Domain: ',
						'options' => array(
							'Administrator' => 'Administrator',
							'COI - General' => 'COI - General',
							'COI - Project' => 'COI - Project',
							'Researcher' => 'Researcher',
							'Reviewer' => 'Reviewer',
							'Other' => 'Other'
						),
						'empty' => ''
					)); ?>
			</td></tr>
			
			<tr><td>
				<?php echo $this->Form->input('status', array(
						'label' => 'Smart Form Status: ',
						'options' => array(
							'Contracted' => 'Contracted',
							'In Development' => 'In Development',
							'Live' => 'Live',
							'Retired' => 'Retired'
						),
						'empty' => ''
					)); ?>
			</td></tr>
			
			<tr><td>
				<?php echo $this->Form->input('launch_date', array(
						'label' => 'Launch Date: ',
						'id' => 'go_live_date',
						'class' => 'date_picker',
						'size' => '20'
					)) . $this->Form->button('TBD', array('id' => 'tbd_button'))
					; ?>
			</td></tr>
			
			<tr><td>
				<?php echo $this->Form->input('developer', array(
					'label' => 'Smart Form Developer: ',
					'options' => array(
						'Unknown' => 'Unknown',
						'Colin' => 'Colin',
						'Kate' => 'Kate',
						'Melanie' => 'Melanie',
						'Toby' => 'Toby'
					),
					'empty' => ''
				)); ?>
			</td></tr>
		</tbody>
		</table>
		<p><?php echo $this->Form->end('Update Smart Form'); ?></p>
	</fieldset>
</div>
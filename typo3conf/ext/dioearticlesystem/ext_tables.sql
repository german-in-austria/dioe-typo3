CREATE TABLE tx_dioearticlesystem_domain_model_dioearticle (

	a_type int(11) DEFAULT '0' NOT NULL,
	a_home int(11) DEFAULT '0' NOT NULL,
	a_date int(11) DEFAULT '0' NOT NULL,
	tags int(11) unsigned DEFAULT '0' NOT NULL,
	prev_title varchar(510) DEFAULT '' NOT NULL,
	prev_text text,
	a_task_cluster varchar(64) DEFAULT '' NOT NULL,
	start_pin smallint(5) unsigned DEFAULT '0' NOT NULL,
	cat_pin smallint(5) unsigned DEFAULT '0' NOT NULL,
	prev_pic int(11) unsigned NOT NULL default '0',
	prev_pic_cropping_mode int(11) DEFAULT '0' NOT NULL,
	detail_title varchar(510) DEFAULT '' NOT NULL,
	detail_text text,
	detail_pic int(11) unsigned DEFAULT '0' NOT NULL,
	detail_pic_cropping_mode int(11) DEFAULT '0' NOT NULL,
	av_files text,
	av_cols int(11) DEFAULT '0' NOT NULL,
	av_aspect_ratio int(11) DEFAULT '0' NOT NULL,
	f_files int(11) unsigned DEFAULT '0' NOT NULL,
	z_user int(11) DEFAULT '0' NOT NULL,
	z_name varchar(512) DEFAULT '' NOT NULL,
	z_title varchar(510) DEFAULT '' NOT NULL,
	z_place int(11) DEFAULT '0' NOT NULL,
	z_l_name varchar(255) DEFAULT '' NOT NULL,
	z_share varchar(510) DEFAULT '' NOT NULL,
	z_com_share varchar(510) DEFAULT '' NOT NULL,
	z_l_text varchar(510) DEFAULT '' NOT NULL,
	p_file int(11) unsigned NOT NULL default '0',
	p_duration varchar(255) DEFAULT '' NOT NULL,
	pub_type int(11) DEFAULT '0' NOT NULL,
	pub_title varchar(510) DEFAULT '' NOT NULL,
	pub_editors_sec text,
	pub_year int(11) DEFAULT '0' NOT NULL,
	pub_month varchar(64) DEFAULT '' NOT NULL,
	pub_booktitle varchar(510) DEFAULT '' NOT NULL,
	pub_publisher varchar(255) DEFAULT '' NOT NULL,
	pub_journal varchar(512) DEFAULT '' NOT NULL,
	pub_volume varchar(255) DEFAULT '' NOT NULL,
	pub_number varchar(64) DEFAULT '' NOT NULL,
	pub_series varchar(255) DEFAULT '' NOT NULL,
	pub_school varchar(512) DEFAULT '' NOT NULL,
	pub_address varchar(510) DEFAULT '' NOT NULL,
	pub_edition varchar(512) DEFAULT '' NOT NULL,
	pub_pages varchar(64) DEFAULT '' NOT NULL,
	pub_keywords int(11) DEFAULT '0' NOT NULL,
	pub_isbn varchar(255) DEFAULT '' NOT NULL,
	pub_doi varchar(255) DEFAULT '' NOT NULL,
	pub_url varchar(510) DEFAULT '' NOT NULL,
	pub_url_date int(11) DEFAULT '0' NOT NULL,
	pub_note varchar(510) DEFAULT '' NOT NULL,
	mee_titel varchar(510) DEFAULT '' NOT NULL,
	mee_persons_sec text,
	mee_organisers_sec text,
	mee_organisation_sec text,
	mee_participants_sec text,
	mee_time int(11) DEFAULT '0' NOT NULL,
	mee_end_time int(11) DEFAULT '0' NOT NULL,
	mee_show_time smallint(5) unsigned DEFAULT '0' NOT NULL,
	mee_text varchar(2048) DEFAULT '' NOT NULL,
	mee_event varchar(510) DEFAULT '' NOT NULL,
	mee_adress varchar(510) DEFAULT '' NOT NULL,
	mee_url varchar(510) DEFAULT '' NOT NULL,
	mee_doi varchar(512) DEFAULT '' NOT NULL,
	mee_note varchar(510) DEFAULT '' NOT NULL,
	mee_keywords int(11) DEFAULT '0' NOT NULL

);

CREATE TABLE tx_dioearticlesystem_domain_model_artikeltags (

	name varchar(510) DEFAULT '' NOT NULL,
	beschreibung text,
	color varchar(255) DEFAULT '' NOT NULL

);

CREATE TABLE tx_dioearticlesystem_dioearticle_artikeltags_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid_local,uid_foreign),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

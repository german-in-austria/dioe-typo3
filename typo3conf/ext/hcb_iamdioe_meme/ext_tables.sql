#
# Table structure for table 'tx_hcbiamdioememe_domain_model_memeentrie'
#
CREATE TABLE tx_hcbiamdioememe_domain_model_memeentrie (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	datum datetime DEFAULT NULL,
	votes int(11) DEFAULT '0' NOT NULL,
	freigegeben smallint(5) unsigned DEFAULT '0' NOT NULL,
	bild int(11) unsigned NOT NULL default '0',
	memetag varchar(255) DEFAULT '' NOT NULL,
	memetexte varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	alterjahre varchar(255) DEFAULT '' NOT NULL,
	geburtsort varchar(255) DEFAULT '' NOT NULL,
	wohnort varchar(255) DEFAULT '' NOT NULL,
	geschlecht varchar(255) DEFAULT '' NOT NULL,
	dialekt smallint(5) unsigned DEFAULT '0' NOT NULL,
	dialektalltag varchar(255) DEFAULT '' NOT NULL,
	dialektbezeichnung varchar(255) DEFAULT '' NOT NULL,
	teilnahme smallint(5) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted smallint(5) unsigned DEFAULT '0' NOT NULL,
	hidden smallint(5) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,
	l10n_state text,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY language (l10n_parent,sys_language_uid)
);

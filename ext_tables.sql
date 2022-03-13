CREATE TABLE pages
(
	uuid varchar(255) DEFAULT '' NOT NULL,

	KEY  uuid (uuid)
);

CREATE TABLE sys_template
(
	uuid varchar(255) DEFAULT '' NOT NULL,

	KEY  uuid (uuid)
);

CREATE TABLE tt_content
(
	uuid varchar(255) DEFAULT '' NOT NULL,

	KEY  uuid (uuid)
);

CREATE TABLE sys_domain
(
	uuid varchar(255) DEFAULT '' NOT NULL,

	KEY  uuid (uuid)
);

CREATE TABLE sys_file_storage (
	uuid varchar(255) DEFAULT '' NOT NULL,

	KEY  uuid (uuid)
);

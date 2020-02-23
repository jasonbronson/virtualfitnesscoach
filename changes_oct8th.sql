CREATE TABLE  `demovfc`.`connectwithothers_usergroup` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
);

CREATE TABLE  `demovfc`.`connectwithothers_profiles` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL,
  `messages` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
);

CREATE TABLE  `demovfc`.`connectwithothers_messages` (
  `message_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `message` mediumtext NOT NULL,
  `thread_id` varchar(10) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY  USING BTREE (`message_id`)
);

CREATE TABLE  `demovfc`.`connectwithothers_group` (
  `id` int(11) NOT NULL auto_increment,
  `groupname` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `statecode` varchar(4) NOT NULL,
  `description` longtext NOT NULL,
  `date_time` datetime NOT NULL,
  `meeting_datetime` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
);



 CREATE TABLE  `demovfc`.`reporting` (
  `id` int(11) NOT NULL auto_increment,
  `data` varchar(400) NOT NULL,
  `occured` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
);

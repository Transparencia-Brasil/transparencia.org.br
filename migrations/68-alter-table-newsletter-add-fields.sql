ALTER TABLE newsletters ADD double_optin tinyint(4) NOT NULL default 0;
ALTER TABLE newsletters ADD double_optin_token varchar(250) null;
ALTER TABLE newsletters ADD double_optin_date datetime null;
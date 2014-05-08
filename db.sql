ALTER TABLE  `months` ADD  `set_active` INT( 1 ) NOT NULL AFTER  `month_name`
ALTER TABLE  `loan` ADD  `pay_per_month` DOUBLE NOT NULL COMMENT  'pay per month' AFTER  `loan_years`
CREATE TABLE IF NOT EXISTS `pay` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `register_no` varchar(10) NOT NULL,
  `type_loan_id` int(11) NOT NULL,
  `money` double NOT NULL,
  `pay_money` double NOT NULL,
  `month_id` varchar(4) NOT NULL,
  `year_id` varchar(4) NOT NULL,
  `pay_status` int(1) NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
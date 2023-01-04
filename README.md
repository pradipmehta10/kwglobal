Kw global modules extend your site functionality and provide feature to accept name as input using custom form.

PLACING MODULE IN THIS DIRECTORY
------------------------------------

You may create custom directory inside /web/module if already is not created, and place this module in web/module/custom directory, to organize your module.


ENABLE MODULE
-----------------------

You can enabled it using drush en kwglobal or from User Interface (admin/modules) search your module name and click on checkbox then click on install.


HOW TO CONFIGURE & ACCESS YOUR MODULE.
----------------

1. Go to Main Menu -> Main navigation -> Click on Edit Menu -> Configure KwGlobal Form
2. Fill the form, you can see message like: You have submitted: xyz
3. Go to /admin/reports/dblog and filter by type kwglobal, you can see message like: You have submitted: xyz
4. clear cache for better result.

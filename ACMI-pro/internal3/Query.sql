SELECT   ta.id AS id, 
         ta.name AS name,
         ta.created_by AS created_by,
         ta.status AS status,
         ta.parent_type AS parent_type,
         ta.parent_id AS parent_id,
         ta.date_start AS date_start,
         ta.date_due AS date_due,
         ta.priority AS priority,
         ta.description AS description,
         ta.contact_id AS contact_id,
         ta.assigned_user_id AS assigned_user_id,
         ta.date_entered as date_entered,
         ta.date_modified as date_modified, 
         tac.date_modified_mobile_c AS date_modified_mobile_c,
         tac.mobile_id_c AS mobile_id_c,
         tac.calender_id_c AS calender_id_c,
         tac.task_notification_status_c AS task_notification_status_c,
         tac.reminder_c AS reminder_c,  tac.record_source_c AS record_source_c,
         tac.mobile_offline_unique_id_c AS mobile_offline_unique_id,
         u.user_name AS user_name, 
         CONCAT(u.first_name,' ',u.last_name ) AS assigned_user_full_name,
         seu.securitygroup_id  AS securitygroup_id,
         sg.name  AS securitygroup_name
FROM tasks AS ta
LEFT JOIN tasks_cstm AS tac ON tac.id_c=ta.id 
LEFT JOIN users AS u ON ta.assigned_user_id = u.id
LEFT JOIN securitygroups_users AS seu ON ta.assigned_user_id=seu.user_id
INNER JOIN securitygroups AS sg ON sg.id=seu.securitygroup_id
WHERE seu.securitygroup_id in (SELECT securitygroup_id FROM securitygroups_users WHERE user_id='f30e5693-657e-e222-bfc7-5b335b90b8fa') AND tac.deleted_from_mobileapp_c = '0'  AND ta.deleted = '0' AND ta.date_modified >=  '12/12/1995 12:12:12' order by ta.date_modified DESC


USE webhub;

INSERT INTO roles (name, permissions) VALUES
('USER', JSON_ARRAY('projects.create','projects.read','projects.update','messages.read','messages.send','messages.delete','media.upload','notifications.read')),
('ADMIN', JSON_ARRAY('users.read','users.update','projects.read','projects.update','projects.status.update','messages.read','messages.send','messages.delete','media.upload','media.delete','services.create','services.update','services.delete','portfolio.create','portfolio.update','portfolio.delete','settings.read','settings.update','features.read','features.update','audit.read')),
('SUPER_ADMIN', JSON_ARRAY('*'))
ON DUPLICATE KEY UPDATE permissions = VALUES(permissions);

INSERT INTO project_statuses (name, slug, color, sort_order, is_system) VALUES
('Yangi','new','#0071E3',10,1),
('Muhokama','discussion','#5856D6',20,1),
('Rejalashtirish','planning','#AF52DE',30,1),
('Dizayn','design','#FF2D55',40,1),
('Dasturlash','development','#34C759',50,1),
('Test','testing','#FF9F0A',60,1),
('Mijoz ko‘rigi','client-review','#5AC8FA',70,1),
('Tuzatish','revision','#FF9500',80,1),
('Yakunlangan','completed','#34C759',90,1),
('Bekor qilingan','cancelled','#FF3B30',100,1)
ON DUPLICATE KEY UPDATE name=VALUES(name), color=VALUES(color), sort_order=VALUES(sort_order);

INSERT INTO feature_flags (`key`, value) VALUES
('chat_enabled',1),
('voice_messages_enabled',1),
('file_upload_enabled',1),
('project_tracking_enabled',1),
('notifications_enabled',1),
('registration_enabled',1),
('maintenance_mode',0)
ON DUPLICATE KEY UPDATE value=VALUES(value);

INSERT INTO settings (`key`, value, is_public) VALUES
('app.name', JSON_OBJECT('value','WebHub'), 1),
('app.version', JSON_OBJECT('value','1.0.0'), 1),
('branding.logo', JSON_OBJECT('value','/assets/images/logo.svg'), 1),
('branding.favicon', JSON_OBJECT('value','/assets/images/favicon.svg'), 1),
('seo.default_title', JSON_OBJECT('value','WebHub — Raqamli mahsulotlar'), 1),
('seo.default_description', JSON_OBJECT('value','WebHub — zamonaviy raqamli mahsulotlar va xizmatlar.'), 1)
ON DUPLICATE KEY UPDATE value=VALUES(value), is_public=VALUES(is_public);

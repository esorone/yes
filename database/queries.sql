select 
max(updated_at),
user_id,
aanwezig
from comments
where aanwezig =1
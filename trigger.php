<!-- 테이블에 적용된 트리거 확인 -->
SELECT event_object_table,trigger_name,event_manipulation,action_statement,action_timing 
FROM information_schema.triggers 
WHERE event_object_table='table name' 
ORDER BY event_object_table,event_manipulation

<!-- 트리거 생성 -->
CREATE TRIGGER trigger_name
AFTER UPDATE or INSERT
ON table_B
FOR EACH ROW
EXECUTE PROCEDURE trigger_function();

<!-- 트리거 함수 생성 -->
CREATE OR REPLACE FUNCTION trigger_upsert_data()
returns trigger
AS $$
DECLARE
BEGIN
    insert into teble_A
        (id, values, created, modified)
    values
        (new.id, new.values, new.created, now());
    return NULL;
END; $$
LANGUAGE 'plpgsql';

<!--
    트리거 함수 생성 후 트리거 실행
-->
// src/supabaseClient.js
import { createClient } from '@supabase/supabase-js';

const supabaseUrl = 'https://hmfximxdcfimpostgresql://postgres:Web2-930-grp3123123123@db.hmfximxdcfimmnsgiuwg.supabase.co:5432/postgresnsgiuwg.supabase.co';
const supabaseAnonKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImhtZnhpbXhkY2ZpbW1uc2dpdXdnIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDU5NTE0NDEsImV4cCI6MjA2MTUyNzQ0MX0.PDnUhKy5ffq_Z0Ng2zH9Tt60BRZa3B9P8vl-MV6Mvso';

const supabase = createClient(supabaseUrl, supabaseAnonKey);

export default supabase;
# stress-test

Distributed load testing via GitHub Actions.

## Usage

1. Go to **Actions** tab
2. Select **distributed-flood**
3. Click **Run workflow**
4. Fill parameters:
   - `target` — host or IP
   - `port` — port
   - `duration` — seconds
   - `workers` — parallel jobs
5. Click **Run workflow**

## Files

- `.github/workflows/flood.yml` — workflow definition
- `worker.php` — HTTP flood worker

## Warning

Use only against infrastructure you own or have permission to test.

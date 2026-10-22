#!/usr/bin/env bash
# Installs the debug build, opens each main section through a deep link and screenshots it.
OUT=out/screens
mkdir -p "$OUT"
log() { echo "$(date +%T) $*" | tee -a out/test-steps.txt; }
T() { timeout "${T_LIMIT:-60}" "$@"; }
log install; T adb install -r out/app-debug.apk >> out/test-steps.txt 2>&1
log launch; T adb shell am start -n com.alifvisa.app/.MainActivity >> out/test-steps.txt 2>&1
sleep 5; T adb exec-out screencap -p > "$OUT/00-launch.png"
sleep 40; T adb exec-out screencap -p > "$OUT/01-home.png"
log scroll; T adb shell input swipe 540 1700 540 700 400
sleep 4; T adb exec-out screencap -p > "$OUT/02-home-scrolled.png"
shot() {
  log "open $2"
  T adb shell "am start -a android.intent.action.VIEW -d '$2' com.alifvisa.app" >> out/test-steps.txt 2>&1
  sleep "${3:-14}"
  T adb exec-out screencap -p > "$OUT/$1.png"
}
shot 03-apply "https://alifvisa.com/visa/search/"
shot 04-track "https://alifvisa.com/track-application/"
shot 05-help "https://alifvisa.com/contact/"
shot 06-account "https://alifvisa.com/dashboard/"
shot 07-about "https://alifvisa.com/about/"
shot 08-blog "https://alifvisa.com/blog/"
shot 09-apply-form "https://alifvisa.com/apply/?from=PK&to=GB&purpose=tourism&type=visit-visa" 16
log back; T adb shell input keyevent KEYCODE_BACK
sleep 4; T adb exec-out screencap -p > "$OUT/10-after-back.png"
log logs
T adb logcat -d -b crash > out/logcat-crash.txt 2>&1
T adb logcat -d > out/logcat-all.txt 2>&1
grep -iE "alifvisa|render process|AndroidRuntime|FATAL" out/logcat-all.txt | tail -300 > out/logcat-app.txt
rm -f out/logcat-all.txt
T adb shell dumpsys package com.alifvisa.app | grep -E "versionCode|versionName|targetSdk" > out/package-info.txt
log done
exit 0

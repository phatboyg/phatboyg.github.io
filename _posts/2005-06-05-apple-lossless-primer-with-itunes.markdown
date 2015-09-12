---
author: chris
comments: true
date: 2005-06-05 01:43:48+00:00
excerpt: iTunes 4.7 added support for lossless audio files. This one addition changed
  iTunes from a novelty into something useful for audio management.
layout: post
slug: apple-lossless-primer-with-itunes
title: Apple Lossless Primer with iTunes
wordpress_id: 50
categories:
- iPod
---

I used to hate iTunes. It only did lossy AAC encoding and was annoying. As an audio purist, I want to keep all of my music in the native CD format with no loss in quality. As a result, I was forced to live with things like Exact Audio Copy, FLAC and Foobar2000. Now, all of these tools are wonderful. They are powerful and designed for the tweaker -- a stark contrast to the user-friendly approach of iTunes.

With iTunes 4.7, Apple introduced the Apple Lossless Codec (ALC). With compression sizes similar to FLAC, the new codec was a reason to consider the switch to iTunes. When they added the feature to import WMA files, I was set. I had around 100GB of FLAC files at the time I started. I use dbPowerAMP Music Convertor to convert everything to WMA Lossless. I then imported the tracks into iTunes, which converted them to Apple Lossless files (.m4a). 

For Apple, ALC is more than just another audio codec. Internally, Apple uses the format in their Airport Express to provide AirTunes support. This feature alone is a great reason to consider using iTunes -- the ability to play your music collection on your stereo over a wired/wireless network connection with pure audio fidelity via either an analog or digital audio connection. For all audio types using the Airport Express, iTunes converts the audio to ALC and send the compressed audio over the network to the APX, which decodes ALC and outputs the original signal.

If you rip your CDs in a non-lossless format, you can expect to rip them again in the future when the technology improves and audio formats get better. You can avoid this trap by ripping everything in lossless now, setting yourself for future formats with an easy conversion. Yes, it takes a lot of disk space, but external hard drives are cheaper than ever and convenience is great when it matched with quality.

One disadvantage of lossless audio is the size of the file when dealing with portable players like the iPod. Users of the iPod shuffle are lucky -- Apple included a feature to automatically convert lossless files to 128 kbps AAC files before copying. However, they have yet to make this feature available for the iPod or iPod mini. There is a solution, however. You can use two logins on your system (like with XP), one to rip your music to lossless and the other to convert to AAC. The process goes like this:

Login as user Admin (for example). Setup your iTunes to use F:\iTunes\Lossless as your music library (your drive letter may vary). Set iTunes to organize your music library. Enable iTunes to group compilations to avoid serious artist spam with soundtrack and various artist discs. Setup iTunes to import music using Apple Lossless. Enable the sound check feature (NOT the sound enhancer) so that each tracks audio levels are calculated and stored in the file. Start ripping your CDs.

While the discs are ripping, be sure to go through them and clean up any tags that are missing or incorrect, and adjust any genre tags that you don't like to more fit your taste. Make sure that soundtrack and various artist albums are tagged properly as "Part of a compilation" so that they are put into a special folder for compilations by album instead of by artist. You can still search for the artist, but they won't overflow your artists window with strange or unknown artist names. This makes finding music much faster on your iPod.

_Note that you can also setup your iPod to use compilations as well, keeping your browse by artist list clean and easier to navigate._

I also recommend using the iTunes Art Importer (google:) to import the cover artwork for all your discs. That way, the files are basically done. They have artwork, audio level information and proper tags. You are done with this user account for now.

Now login as your regular user (i.e., Joe). Once you are logged in, startup iTunes. You'll have a clean library with no music. Go in and adjust your settings such that music is imported with AAC at the bitrate you desire (I suggest 160 or 192 kbps, your choice really). Setup your library to be at F:\iTunes\AAC. Set iTunes to organize your music collection and enable sound check and compilations as before.

Now here is the kicker. Use the File menu to Add Folder to library. Add F:\iTunes\Lossless. This will add the entire contents of this folder to your library but not copy any files (yes, be sure "Copy to library" is disabled). You can now select all your files, right-click and choose "Convert to AAC" from the menu. This will start the long process of converting all your songs to the AAC bitrate you selected. The sweet part is the files are created in the new folder F:\iTunes\AAC, leaving your original files in the other folder. All your audio level, artwork, tagging, etc. are retained in the new file. 

Once your files are converted, you can either clear your entire library and then Add the F:\iTunes\AAC folder to you library or leave both versions in your library. Your choice. If you remove everything and only add the AAC versions, you can use the automatic synchronization to your iPod and your entire collection will be copied to your iPod. Otherwise, you can manual synchronize using a Smart Play list and only include tracks in AAC format by excluding the Apple Lossless tracks using the playlist filters. The bummer here is that you play counts don't update on the lossless files (oh well). Hopefully a future update to iTunes will add the ability to downsample for the other iPods and the circle will be complete.

I hope this guide has helped understand how media management can be made easy with iTunes. 




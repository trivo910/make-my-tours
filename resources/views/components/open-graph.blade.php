<meta property="og:type" content="{{ $socialType ?? 'website' }}">
<meta property="og:site_name" content="Make My Tours &amp; Travels">
<meta property="og:title" content="{{ $socialTitle }}">
<meta property="og:description" content="{{ $socialDescription }}">
<meta property="og:url" content="{{ $socialUrl ?? url()->current() }}">
<meta property="og:image" content="{{ $socialImage }}">
<meta property="og:image:alt" content="{{ $socialImageAlt ?? $socialTitle }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $socialTitle }}">
<meta name="twitter:description" content="{{ $socialDescription }}">
<meta name="twitter:image" content="{{ $socialImage }}">

<?php

declare(strict_types=1);

namespace Cordis\Entity;

/**
 * Defines the organization types.
 */
enum OrganizationType: string
{
    case Coordinator = 'coordinator';
    case Participant = 'participant';
    case ThirdParty = 'thirdParty';
    case AssociatedPartner = 'associatedPartner';
}
